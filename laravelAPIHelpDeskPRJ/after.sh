#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.

sudo apt-get install supervisor
sudo npm install -g laravel-echo-server

if [ ! -f /etc/supervisor/conf.d/laravel-echo.conf ]; then
    configs_echo="[program:laravel-echo]
directory=/home/vagrant/code
process_name=%(program_name)s_%(process_num)02d
command=/usr/bin/laravel-echo-server start
autostart=true
autorestart=true
user=vagrant
numprocs=1
redirect_stderr=true
stdout_logfile=/home/vagrant/code/storage/laravel_echo_server.log"
    
    sudo sh -c "echo '$configs_echo' > /etc/supervisor/conf.d/laravel-echo.conf"
    sudo supervisorctl reread
    sudo supervisorctl update
    sudo supervisorctl start laravel-echo:*
fi


if [ ! -f /etc/supervisor/conf.d/laravel-worker.conf ]; then
    configs_worker="[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /home/vagrant/code/artisan queue:work --tries=3
autostart=true
autorestart=true
user=vagrant
numprocs=2
redirect_stderr=true
stdout_logfile=/home/vagrant/code/storage/laravel_worker.log"
    
    sudo sh -c "echo '$configs_worker' > /etc/supervisor/conf.d/laravel-worker.conf"

    sudo supervisorctl reread
    sudo supervisorctl update
    sudo supervisorctl start laravel-worker:*
fi