## We plan to implement a feature to control user access to website products. This feature should check user access based on the following features and conditions:
## Rules:
### If a user is not logged in to the website, they do not have access to any products.
### If a user has an inactive status, they do not have access to any products.
### A user's access to a requested product is only possible through a purchased subscription.
### If a user has a product subscription but the subscription has expired, the user does not have access to the product.
### If a user's subscription is inactive, they do not have access to the desired product.

## This project has been implemented using the Chain of Responsibility design pattern.