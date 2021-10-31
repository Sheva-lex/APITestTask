***
<h1 align="center" style="color:red;">Laravel API + Vue.js category/products showing and filtering data  </h1>

## About the project

- __Saving categories and goods in the database__
    - _Categories: name, image, is_active, priority, created_at, updated_at_
    - _Products: category_id, name, description, image, is_active, priority, created_at, updated_at_
- __Implemented API, which selecting products for a given category, or a general list with pagination__
- __Used Vue.js framework (Axios method) to make an API requests and filtering data__
    - _Laravel Vue Pagination component for Laravel paginators that works with Bootstrap_
    - _Vue Router component_
- __Project pages__
    - _home page(all products with pagination and filtering by category)_
    - _show product page_
- __Admin panel__
    - _Basic CRUD operation with categories and products_
    - _Dashboard page with a statistic_

## How to use

- Clone the repository with git clone
- Copy .env.example file to .env and edit database credentials there
- Run the following command:

```bash
composer install
php artisan key:generate
php artisan storage:link
Run php artisan migrate --seed
Run npm install
Run npm run dev
```

- That's it: launch the main URL

***

