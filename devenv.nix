<<<<<<< HEAD
{ pkgs, lib, config, inputs, ... }:

{
  # https://devenv.sh/basics/
  env.GREET = "devenv";

  # https://devenv.sh/packages/
  packages = [ pkgs.git ];

  # https://devenv.sh/languages/
  # languages.rust.enable = true;

  # https://devenv.sh/processes/
  # processes.dev.exec = "${lib.getExe pkgs.watchexec} -n -- ls -la";

  # https://devenv.sh/services/
  # services.postgres.enable = true;

  # https://devenv.sh/scripts/
  scripts.hello.exec = ''
    echo hello from $GREET
  '';

  # https://devenv.sh/basics/
  enterShell = ''
    hello         # Run scripts directly
    git --version # Use packages
  '';

  # https://devenv.sh/tasks/
  # tasks = {
  #   "myproj:setup".exec = "mytool build";
  #   "devenv:enterShell".after = [ "myproj:setup" ];
  # };

  # https://devenv.sh/tests/
  enterTest = ''
    echo "Running tests"
    git --version | grep --color=auto "${pkgs.git.version}"
  '';

  # https://devenv.sh/git-hooks/
  # git-hooks.hooks.shellcheck.enable = true;

  # See full reference at https://devenv.sh/reference/options/
=======
{ pkgs, lib, config, ... }:

{
  dotenv.enable = true;
  
  env = {
    GREET = "Shopware 6 Dev";
    # Match the port 3307 seen in your logs
    DATABASE_URL = "mysql://root@127.0.0.1:3307/shopware";
    APP_URL = "http://localhost:8000";
  };

  # 1. Add Composer & Node.js directly to packages
  packages = with pkgs; [ 
    git 
    php82Packages.composer 
    nodejs_20
  ];

  languages.php = {
    enable = true;
    version = "8.3";
    
    extensions = [ "gd" "intl" "zip" "pdo_mysql" "opcache" "mbstring" "iconv" "curl" ];
    
    fpm.pools.web = {
      phpOptions = ''
        memory_limit = 512M
        max_execution_time = 300
      '';
    };

  };

services.mysql = {
    enable = true;
    package = pkgs.mariadb;
    # Ensure root is configured correctly on every startup if needed
    initialDatabases = [{ 
      name = "shopware";
    }];
  };




  services.caddy = {
    enable = true;
    virtualHosts.":8000".extraConfig = ''
      root * public
      php_fastcgi unix/${config.languages.php.fpm.pools.web.socket}
      file_server
    '';
  };

  enterShell = ''
    echo "Welcome to $GREET"
    # Manually run composer install if vendor doesn't exist
    if [ ! -d "vendor" ]; then
      composer install
    fi
  '';
>>>>>>> master
}
