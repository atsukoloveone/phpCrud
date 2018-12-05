<?php
class ProductRestClient {

    private $_url = '';
    private $_ch = null;

    private $_response = array();

    const REQUEST_TYPE_DELETE   = 'DELETE';
    const REQUEST_TYPE_GET      = 'GET';
    const REQUEST_TYPE_POST     = 'POST';
    const REQUEST_TYPE_PUT      = 'PUT';

    const POST_FORMAT_JSON      = 'json';

    public function __construct( $url = null) {
      $this->_startcURL();
      $this->_setURL( $url );

    }
    private function _startcURL() {
        $this->_ch = curl_init();
        curl_setopt( $this->_ch, CURLOPT_HEADER, true );
        curl_setopt( $this->_ch, CURLOPT_CRLF, true );
        curl_setopt( $this->_ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $this->_ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $this->_ch, CURLOPT_SSL_VERIFYPEER, false );
    }

    private function _setURL( $url ) {
        $this->_url = $url;
    }

    public function execute( $type, $path, $params = array(), $header = array() ) {
        curl_setopt( $this->_ch, CURLOPT_CUSTOMREQUEST, $type );

        switch ( $type ) {
            case self::REQUEST_TYPE_DELETE:
                $this->_initPostFields( $params );
            break;

            case self::REQUEST_TYPE_GET:
                curl_setopt( $this->_ch, CURLOPT_HTTPGET, true );
            break;

            case self::REQUEST_TYPE_POST:
                curl_setopt( $this->_ch, CURLOPT_POST, true );
                $this->_initPostFields( $params );
            break;

            case self::REQUEST_TYPE_PUT:
                $this->_initPostFields( $params );
            break;

            default:
                // We already check the request type is valid, so default case can do nothing
            break;
        }

        $this->_initHeader( $header );
        if ( $type !== self::REQUEST_TYPE_GET ) {
            $params = array();
        }
        $this->_initURL( $path, $params );
        $this->_runcURL();

        return $this->_response;
    }

    private function _initURL( $path, $params = array() ) {
        $url = sprintf( '%s%s', $this->_url, $path );
        if ( is_array( $params ) && count( $params ) > 0 ) {
            /*
             * If we have additional parameters (usually a GET request), append the
             * additional parameters to the URL
             */
            $url .= sprintf( '?%s', http_build_query( $params ) );
        }
        // Otherwise (POST, PUT, DELETE), just set the URL
        curl_setopt( $this->_ch, CURLOPT_URL, $url );
    }
    private function _initHeader( $header = array() ) {

        if ( is_array( $header ) && count( $header ) > 0 ) {
            curl_setopt( $this->_ch, CURLOPT_HTTPHEADER, $header );
        }
    }
    private function _runcURL() {
        $response   = curl_exec( $this->_ch );
        $info       = curl_getinfo( $this->_ch );
        $headerSize = curl_getinfo( $this->_ch, CURLINFO_HEADER_SIZE );

        $this->_response['header']    = substr( $response, 0, $headerSize );
        $this->_response['body']      = substr( $response, $headerSize );
        $this->_response['http_code'] = $info['http_code'];

      }

      private function _initPostFields( $params ) {
          if ( is_array( $params ) && count( $params ) > 0 ) {
            //if ( $this->_postFormat == self::POST_FORMAT_JSON ) {
                  $params = json_encode( $params );
            //}
              curl_setopt( $this->_ch, CURLOPT_POSTFIELDS, $params );
          }
          else if ( !is_null( $params ) ) {
              //if ($this->_postFormat == self::POST_FORMAT_JSON ) {
                  $params = json_encode( $params );
              //}

              curl_setopt( $this->_ch, CURLOPT_POSTFIELDS, sprintf( '@%s', $params ) );
          }
          else {
            //  if ( $this->_postFormat == self::POST_FORMAT_JSON ) {
                  $params = json_encode( $params );
            //  }
              curl_setopt( $this->_ch, CURLOPT_POSTFIELDS, $params );
          }
      }

}

?>
