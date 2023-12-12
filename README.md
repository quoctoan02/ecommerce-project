# Magento-Ecommerce 

## Setup docker
The system have to install docker and docker compose (docker compose must be a latest version by below instruction). The instruction of installation can be found in google or [How to install Docker in Ubuntu](https://docs.docker.com/engine/install/ubuntu/):

```bash
# The instruction of installation for docker compose in ubuntu
sudo curl -L https://github.com/docker/compose/releases/download/1.28.5/docker compose-Linux-x86_64 -o /usr/local/bin/docker compose
chmod +x /usr/local/bin/docker compose
```
After installing docker, remember to run this below command to add user for adding right rule to running Docker without typing sudo. After typing, remember to logout and login again. 
```bash
sudo usermod -aG docker $USER
```

## How to use
```
# Clone a repository
git clone https://github.com/quoctoan02/ecommerce-project.git

# Go to a folder
cd ~/ecommerce-project

# Create a file .env, Can edit if necessity
cp env-example .env

# Running docker compose
docker compose up -d

# Show all services
./scripts/list-services

# Create a database with "magentolocal" name
./scripts/database create --database-name=magentolocal

# Go to "https://commercemarketplace.adobe.com/customer/accessKeys/" to get your magento access key
# Automatically download and install Magento
# Note: you need to type a access key if necessity
./scripts/init-magento --domain=magentolocal.com --magento-version=2.4.4 --magento-edition=community --php-version=php81-c2

# Turn on SSL for domain
./scripts/ssl --domain=magentolocal.com

./scripts/shell php81-c2
cd magentolocal.com

./scripts/create-vhost --domain=magentolocal.com --app=magento2 --root-dir=magentolocal.com --php-version=php81-c2

```
php bin/magento setup:install --base-url=http://magentolocal.com/ --db-host=mysql --db-name=magento --db-user=root --db-password=root --admin-firstname=admin --admin-lastname=admin --admin-email=admin@admin.com --admin-user=admin --admin-password=admin@123321 --language=en_US --currency=USD --timezone=America/Chicago --use-rewrites=1 --search-engine=elasticsearch7 --elasticsearch-host=elasticsearch --elasticsearch-port=9200
```
```

## License

[MIT](https://choosealicense.com/licenses/mit/)