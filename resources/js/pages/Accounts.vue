<template>
    <div>
        <b-button variant="outline-primary" class="float-right" v-b-modal.modal-center>+</b-button>

        <b-modal id="modal-center" centered title="Add New Account">
            <b-form @submit="onSubmit" @reset="onReset">
                <b-form-group
                        id="input-group-1"
                        label="Name:"
                        label-for="input-1"
                >
                    <b-form-input
                            id="input-1"
                            v-model="form.name"
                            type="text"
                            required
                            placeholder="Enter name"
                    ></b-form-input>

                </b-form-group>
                <b-form-group>
                    <b-form-file v-model="form.avatars" accept="image/jpeg, image/jpg, image/png" multiple></b-form-file>
                </b-form-group>

                <b-button type="submit" variant="primary" class="mt-">Submit</b-button>
            </b-form>
        </b-modal>

        <h1>Accounts</h1>

        <b-table small :fields="fields" :items="ACCOUNTS" responsive="sm">
            <!-- A virtual column -->
            <template v-slot:cell(id)="data">
                {{ data.value }}
            </template>

            <!-- A custom formatted column -->
            <template v-slot:cell(name)="data">
                <b class="text-info">{{ data.value.toUpperCase() }}</b>
            </template>

            <template v-slot:cell(avatar)="data">
                <img :src="data.value" width="50" v-if="data.value">
            </template>
        </b-table>
    </div>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'

  export default {
    name: 'Accounts',
    data() {
      return {
        form: {
          name: '',
          avatars: []
        },
        fields: [
          // A virtual column that doesn't exist in items
          'id',
          // A column that needs custom formatting
          { key: 'name', label: 'Name' },
          // A regular column
          'avatar',
        ]
      }
    },
    computed: {
      ...mapGetters('Account', [
        'ACCOUNTS',
      ]),
    },
    created () {
      this.GET_ACCOUNTS()
    },
    methods: {
      ...mapActions('Account', [
        'GET_ACCOUNTS', 'CREATE_ACCOUNT'
      ]),
      onSubmit(evt) {
        evt.preventDefault()
        let formData = new FormData();
        formData.append('name', this.form.name)

        for (let i = 0; i < this.form.avatars.length; i++) {
          let file = this.form.avatars[i];
          formData.append('avatars[' + i + ']', file);
        }

        this.CREATE_ACCOUNT(formData).then(() => {
            alert('Successfully')
        })
      },
      onReset(evt) {
        evt.preventDefault()
        this.form.name = ''
        this.form.avatars = []
      }
    },
  }
</script>

<style scoped>

</style>