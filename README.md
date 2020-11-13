## How to run

1 git clone
2 composer install
3 php artisan:migrate
4 php artisan db:seed
5 php artisan serve


## endpoints 

GET - /api/v1/categories - get list of categories
GET - /api/v1/categories/{limit=25}/{offset=0}

POST - /api/v1/categories - create category
send `name` in post request to create

PUT /api/v1/categories/{category_id} - update category
send `name` in post request to update

DELETE /api/v1/categories/{category_id} - delete category

GET - api/v1/categories/{category_id}/products/{limit?}/{offset?} - get list of products of any category

GET - api/v1/products - list of products
POST - api/v1/products - create products
    form data = [
        name, description, [category_id, category_id, ...]
    ]

PUT - api/v1/products/{product_id} - update product 
    form data = [
        name, description, [category_id, category_id, ...]
    ]

DELETE - api/v1/products/{product_id} - delete product

