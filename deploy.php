<?php
namespace Deployer;

require 'recipe/common.php';
require 'vendor/deployer/recipes/recipe/rsync.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', '');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server
set('writable_dirs', []);

/**
 * rsysc task configration
 */
set('rsync',[
    'exclude' => [
        '.git',
        '.gitignore',
        'composer.json',
        'composer.lock',
        'vendor/*',
        'tests/*',
        'prodocuts/ini/*'
    ],
    'exclude-file' => false,
    'include'      => [],
    'include-file' => false,
    'filter'       => [],
    'filter-file'  => false,
    'filter-perdir'=> false,
    'flags'        => 'rzp', // Recursive, with compress, and keep permission (rsynのオプション
    'options'      => ['delete'],
    'timeout'      => 60,
]);

// Hosts

//host('project.com')
//    ->set('deploy_path', '~/{{application}}');

host('loveserve')
    ->stage('test_client')
    ->set('deploy_path', '/home/atsuko/sites/loveserve.test2/');

// Tasks

desc('Deploy your project');
task('deploy_org', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'rsync',
    //'deploy:vendors',
    'deploy:symlink',
    'cleanup',
])->desc('Deploy your project');

set('copy_dirs', [
  'web/products/',
  'web/classes/',
  'composer.json',
  'composer.lock',
  'dumpapi_db.sql'
]);

task('test', function () {
    writeln('Hello world');
});

task('pwd', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
});

task('deploy:upload', function() {
    $files = get('copy_dirs');
    //$releasePath = get('release_path');
    $deploy_path = get('deploy_path');

    foreach ($files as $file)
    {
       if(strpos($file,'\.ini') === false){
        //echo "check" . $file;
        upload($file, "{$deploy_path}{$file}");
      }
    }
});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
