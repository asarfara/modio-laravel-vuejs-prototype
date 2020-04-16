<template>
    <div class="md-layout md-gutter md-alignment-center app">
        <div class="md-layout-item md-large-size-100 u-padding-right-4 u-padding-left-4 app__search">
            <md-field>
                <label>Search</label>
                <md-input v-model="search"></md-input>
            </md-field>
        </div>
        <div class="md-layout-item md-large-size-100 u-padding-right-4 u-padding-left-4 u-padding-top-2">
            <md-button class="md-raised u-margin-right-2" @click="getGames('name')">Name</md-button>
            <md-button class="md-raised u-margin-right-2" @click="getGames('popular')">Popular</md-button>
        </div>
        <div class="md-layout-item md-large-size-25 md-medium-size-30 md-small-size-50 md-xsmall-size-50" v-for="game in games">
            <div class="product-card u-margin-top-2 u-margin-bottom-2">
                <a :href="game.url">
                    <div class="product-card__image u-padding-top-1">
                        <img :src="game.img"/>
                    </div>
                    <div class="product-card__header u-padding-left-1 u-padding-top-1 u-padding-bottom-1">
                        {{ game.name }}
                    </div>
                </a>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'App',
        data() {
            return {
                'search': '',
                'gameResponse': [],
            }
        },
        computed: {
            games() {
                return this.mapGames().filter(item => {
                    return item.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1
                })
            }
        },
        methods: {
            mapGames() {
                let games = [];

                this.gameResponse.forEach(function (data) {
                    let game = {
                        'name': data.name,
                        'img': data.logo.thumb_320x180,
                        'url': data.profile_url
                    };

                    games.push(game);
                });

                return games;
            },
            getGames(sort = '') {
                let url = 'https://api.mod.io/v1/games?api_key=2e6dc3178298eae219b7f8fc8459542e&_limit=100';

                if (sort !== '') {
                    url = url + '&_sort=' + sort;
                }

                axios.get(url)
                    .then(response => {
                        this.gameResponse = [];
                        this.gameResponse = response.data.data;
                    }).finally(() => {
                    this.mapGames();
                });
            }
        },
        created() {
            this.getGames();
        }
    }
</script>
