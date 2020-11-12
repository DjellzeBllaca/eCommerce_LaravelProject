## About This App

This application allows to manage private post offices and also is an e-commerce app, built from scratch. It is build using Laravel, MySQL, Bootstrap 4, SASS and JS.

Please read below to find more details.

## Home Page
As you can see from home page there are availabe multiple links, like Track Order, Login, Register etc, and also there's an image slider 

![](/ApplicationScreenshots/0.png)


## Product Cards And Filtering
Product Cards are nicely designed with SASS and also there is option to filter products based on their category

![](/ApplicationScreenshots/1.png)


## Product Details
Clicking View button at any Card, opens following page which shows different data about that specific product.

![](/ApplicationScreenshots/2.png)


## Track Order (E-Mail Tested With [Mailtrap](https://mailtrap.io/))
There's also an option to track order. This option allows buyers to track their order with phone numer and tracking id, which is sent to users with email when user purchases products.

![](/ApplicationScreenshots/3.png)


## Search With [Algolia](https://www.algolia.com/users/sign_up)
All products can be searched from search bar, using Algolia plugin (this option may not directly work, because Algolia offers only 14-days free trial. You may sign up for free trial in Algolia, and then make sure to configure env file properly)

![](/ApplicationScreenshots/4.png)


## Multi Role Authentication
Four (4) types of users can login: Admin, Seller, Buyer and Post Office Employee. Login form is shown in following screenshot, and similar form is register form also.

![](/ApplicationScreenshots/5.png)


## Admin Chooses Employee To Complete Order Delivery
Admin can choose which employee to complete delivery

![](/ApplicationScreenshots/6.png)


## Admin Can Manage Clients (Sellers) Or Search For Them (Local Search, [Algolia](https://www.algolia.com/users/sign_up) Not Used In This Example)
Admin has different option with which he can manage client accounts like seeing all client orders, disabling their account (if client is logged in he will automatically be kicked out of his account, otherwise login will not be permitted) or completely deleting their account

![](/ApplicationScreenshots/7.png)


## Seller Can See His Order
All sellers can see orders made to them and different informations about each order, ex. is item purchased, delivered etc.

![](/ApplicationScreenshots/8.png)


## Seller Can Add Products
Seller can add products (and also edit/delete them). Following form shows how user can add products.

![](/ApplicationScreenshots/9.png)


## Each Buyer Has His Cart
Buyers can add products to cart, change amount or completely remove them from cart. Price for each product and total price are dynamically calculated with JavaScript. 

![](/ApplicationScreenshots/10.png)


## Purchase Products With Stripe
Stripe plugin is also integrated.It allows transactions from web pages.

![](/ApplicationScreenshots/11.png)


## Post Employee Can Mark Orders As Delivered
Lastly each post employee can see orders that he/she needs to deliver, and can mark them as delivered.

![](/ApplicationScreenshots/12.png)


## More 
There are other options in this app, however only a few most important have been featured. You can download and run this app to see all of those options.

... and don't forget to import some products, from seller account, to try out all functionalities!
