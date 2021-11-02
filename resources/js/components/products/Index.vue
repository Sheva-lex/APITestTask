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
                <div class="form-group mb-4 mr-4">
                    <select class="form-control mr-1" v-model="params.sortField">
                        <option value="created_at">За датою</option>
                        <option value="price">За ціною</option>
                    </select>
                    <div v-if="params.sortDirection === 'asc'" class="form-control cursor-pointer">
                        <i class="fas fa-arrow-up" @click="params.sortDirection = 'desc'"></i>
                    </div>
                    <div v-if="params.sortDirection === 'desc'" class="form-control cursor-pointer">
                        <i class="fas fa-arrow-down" @click="params.sortDirection = 'asc'"></i>
                    </div>
                </div>
                <input id="search" class="form-control mb-4 mr-4" type="text" v-model="search" placeholder="Пошук">
                <div class="form-group mb-4 mr-4">
                    <label for="perPage" class="mr-1">Показати: </label>
                    <select id="perPage" name="perPage" class="form-control" v-model="params.perPage">
                        <option :value="5">5</option>
                        <option :value="10">10</option>
                        <option :value="15">15</option>
                        <option :value="20">20</option>
                    </select>
                </div>


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
                perPage: 5,
                sortField: 'created_at',
                sortDirection: 'desc',
            },
            search: ''
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
        },
        search(val, old) {
            if (val.length >= 2 || old.length >= 2) {
                this.loadProducts();
            }
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
                    search: this.search.length >= 2 ? this.search : '',
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

<style scoped>
.cursor-pointer {
    cursor: pointer;
}
</style>

