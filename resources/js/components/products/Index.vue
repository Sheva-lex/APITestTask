<template>
    <div class="container">
        <div class="row">
            <div class="col form-inline">
                <select class="form-control mb-4 mr-4" v-model="params.categoryId">
                    <option value="">Виберіть категорію</option>
                    <option v-for="category in categories"
                            :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
<!--                <input class="form-control mb-4 mr-4" type="text" v-model="params.searchField" placeholder="Пошук">-->
            </div>
        </div>
        <div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col" v-for="product in products.data">
                    <div class="card shadow-sm">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h8 class="my-0 fw-normal">{{ product.name }}</h8>
                        </div>
                        <div class="d-flex justify-content-center mt-4 w-100">
                            <img :src="product.image" class="w-75">
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ product.description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <router-link :to="{name: 'showProduct', params: {id: product.id}}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Детальніше
                                        </button>
                                    </router-link>
                                </div>
                                <div class="btn-group text-muted">
                                    Ціна: {{ product.price }} грн.
                                </div>
                                <small class="text-muted">{{ product.created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <pagination :data="products" @pagination-change-page="loadProducts"></pagination>
            <div class="alert alert-danger" role="alert" v-if="errored">
                Помилка загрузки даних!
            </div>
            <div class="text-center" v-if="loading">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            categories: {},
            products: {},
            loading: true,
            errored: false,
            params: {
                categoryId: '',
                // searchField: '',
                // perPage: 5,
                // sortField: 'created_at',
                // sortDirection: 'desc',
            },
        }
    },
    mounted() {
        this.loadCategories();
        this.loadProducts();
    },
    watch: {
        params: {
            handler() {
                this.loadProducts();
            },
            deep: true
        }
    },
    methods: {
        loadCategories: function () {
            axios.get('/api/v1/categories')
                .then((response) => {
                    this.categories = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                    this.errored = true;
                });
        },
        loadProducts: function (page = 1) {
            axios.get('/api/v1/products', {
                params: {
                    page,
                    ...this.params
                }
            })
                .then((response) => {
                    this.products = response.data;
                    this.loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                    this.errored = true;
                });
        },
    }
}
</script>

