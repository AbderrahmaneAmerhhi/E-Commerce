[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://main--abderrahmaneamerrhiportfoliov2.netlify.app/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/abderrahmane-amerrhi-807b40201/)

# Ecommerce Web App

A Ecommerce Web App that enables you to sell your products, manage your store in a simple and excellent way

Discover [Vedio](https://abderrahmaneamerrhi.com/assets/sieved-25dda1ed.mp4).

## Information

I built the app using laravel , made a simple backend CRUD and use blade in front end

### Technologies used in Backend

| Technology        |        Description        | Version |
| :---------------- | :-----------------------: | :-----: |
| Php               |       PHP language        |  ^7.0   |
| Laravel           | Laravel backend framework |  ^8.65  |
| laravel/ui        |        UI Package         |  ^3.3   |
| stripe/stripe-php |  stripe checkout Package  | ^7.100  |
| srmklive/paypal   |  paypal checkout Package  |  ~1.0   |

## Cloning and use

```bash or terminal
  # Cloning app
  git clone  https://github.com/AbderrahmaneAmerhhi/E-Commerce

  # install composer
   composer install
   php artisan config:clear
   php artisan config:cache
  # copy .env.example => rename it to .env

  # generate App key
   php artisan key:generate

  # install node_modules
   npm install

```

## Configuration

```env
# in .env file config database

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabse_name
DB_USERNAME=root
DB_PASSWORD=databasepassword

# config Mail add your mail configuration

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

# add your Paypal configuration
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_API_USERNAME=YourUserName
PAYPAL_SANDBOX_API_PASSWORD=YourPassword
PAYPAL_SANDBOX_API_SECRET=YourSecret


```

## Migrate database and run app

```bash or terminal
  ########### open app in terminal or cmd or bash ... ###############
  # Migrate data base run in terminal
   php artisan migrate

  # seed database
   php artisan db:seed

  # run app
  php artisan serve
   ## in other terminal
    npm run dev

  # open app in
  http://127.0.0.1:8000

  # login to admin dashboard
   Url :http://127.0.0.1:8000/admin/login
   Email :   admin@gmail.com
   Password : admin


```

## Features

-   Dynamic backend with laravel Backend framework
-   Responsive front-end with dark mode and other widgets built using vue.js framework

#### Dashboard Features

-   Administrators can manage product categories, add new categories, update a category, delete a category

-   Administrators can also manage products, edit, delete product view

-   Manage orders

-   manage visitors review accept them or remove them

#### User side

-   Visitors can view your products and store information and can send you email Create a new account Log in...

-   To buy a new product, add a new review, the user must be connected to their own account

-   user can add comment to product can add product to cart and pay with paypal or strip with cart
-   Nice scroll banner

-   filter products by categories

-   User can edit profile image and email password name ...

## Some dashboard images

#### Admin Login

![Admin Login image](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/backend/2023-11-03-22-58-03.png)

#### Manage Categories

![manage cats image](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/backend/2023-11-03-22-58-23.png)

#### Manage Products

![manage products image1](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/backend/2023-11-03-22-58-33.png)

#### Manage Users comments

![manage comm image1](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/backend/2023-11-03-23-00-18.png)

## Some user side images

#### User Login Register

![User Login image](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/frontend/login.png)
![User Register image](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/frontend/register.png)

#### Home

![ home image1](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/frontend/home1.png)
![ home image2](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/frontend/home2.png)
![ home image3](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/frontend/HomeProducts.png)
![ home image4](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/frontend/homecontact.png)

#### Show Porduct

![ Porduct image1](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/frontend/showproduct.png)

#### Cart

![ Cart image1](https://github.com/AbderrahmaneAmerhhi/E-Commerce/blob/main/public/images/github/frontend/cart.png)
