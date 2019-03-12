<template>
    <div>
        <div>
            <label class="typo__label">Теги</label>
            <multiselect v-model="value"
                         tag-placeholder="Добавить тег"
                         placeholder="Введите тег"
                         label="title" track-by="id"
                         :options="options"
                         :multiple="true"
                         :taggable="true"
                         @tag="addTag"
                         @select="addValue"
                         @remove = "removeValue"

            ></multiselect>
            <!--<pre class="language-json"><code>{{ value  }}</code></pre>-->
                <input type="hidden" v-for="val in valuesArr" :value="val" name="tags[]">
            <!--<input type="hidden" :value="valuesArr" name="tags[]">-->
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import axios from 'axios'

    // register globally
    Vue.component('multiselect', Multiselect);

    export default {
        name: "AdminTags",
        components: { Multiselect },
        props: [
            'token', 'tags'
        ],
        data () {
            return {
                value: [],
                options: [
                    // { title: 'Vue.js', id: 'vu' },
                    // { title: 'Javascript', id: 'js' },
                    // { title: 'Open Source', id: 'os' }
                ],
                valuesArr: '',
                // valuesJSON: [],
            }
        },
        methods: {
            addTag (newTag) {
                self=this;

                axios({
                    method: 'POST',
                    url: '/api/tag',
                    headers: {
                        Authorization: 'Bearer ' + self.token
                    },
                    data: {
                        title: newTag
                    }
                })
                    .then(function (response) {
                        const tag = {
                            title: response.data.title,
                            id: response.data.id
                        };
                        self.options.push(tag);
                        self.value.push(tag);
                        self.values.push(tag.id);
                    });
            },
            addValue: function (e) {
                self = this;
                self.valuesArr = [];
                self.valuesArr.push(e.id);
                self.value.forEach(function(val) {
                    self.valuesArr.push(val.id);
                });

                // this.valuesJSON.push(e.id);
                // self.valuesArr = JSON.stringify(self.valuesArr);
                // console.log(self.valuesArr = JSON.stringify(self.valuesArr));
            },
            // Remove tag from hidden input id's array
            removeValue: function (e) {
                self = this;
                let id = e.id;
                let position = self.valuesArr.indexOf(id);
                if ( ~position ) self.valuesArr.splice(position, 1);
            },
        },
        created() {
            self = this;
            axios.get('/api/tag')
                .then(function(response) {
                    response.data.forEach(function (tag) {
                        self.options.push(tag);
                        // self.addTag(tag);
                    });
                });

            if (self.tags != undefined) {
                self.tags.forEach(function (tag) {
                    self.addValue(tag);
                    self.value.push(tag);
                });
            }
        }
    }
</script>
<!--<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>-->

<style scoped>

</style>