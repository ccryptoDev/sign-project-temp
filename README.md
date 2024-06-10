## The steps to run sign-controller with docker

1. clone a git repo and  go to `sign-controller` directory

2. Create .env:  
   - Run `sudo cp src/.env.example src/.env`
   - Open src/.env and configure env variables

3. Run `sudo docker-compose build`

4. Run `sudo docker-compose up` if no any error

5. Install php dependencies:  
   - Run `sudo docker-compose exec php composer install`
   - It will install php dependencies and as a result, `vendor` directory will be created in `/var/www/html/`

6. Database migration:
   - Run `sudo docker-compose exec php php /var/www/html/artisan migrate`
   - Run `sudo docker-compose exec php php /var/www/html/artisan db:seed`

## The configuration steps to run automatically sign-controller with docker when rebooting or restarting

7. Create a systemd Service File
   - Run `sudo nano /etc/systemd/system/docker-compose-laravel.service`
   - The above command creates & opens `docker-compose-laravel.service` file in `/etc/systemd/system/`
   - Then, fill up a systemd service file with the following content and save it:
   ``` docker-compose-laravel.service
   [Unit]
   Description=Docker Compose Application Service
   Requires=docker.service
   After=docker.service

   [Service]
   Type=simple
   WorkingDirectory=/home/inexadmin/sign-controller
   ExecStart=/usr/bin/docker-compose up --build app
   ExecStop=/usr/bin/docker-compose down
   TimeoutStartSec=0
   Restart=always

   [Install]
   WantedBy=multi-user.target

8. Reload systemd: 
   `sudo systemctl daemon-reload`

9. Enable the Service: 
   `sudo systemctl enable docker-compose-laravel.service`

10. Start or Restart the service: 
   `sudo systemctl start docker-compose-laravel.service`
   or
   `sudo systemctl restart docker-compose-laravel.service`
