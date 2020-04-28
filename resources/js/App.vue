<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="primary">
            <b-navbar-brand href="#">Task</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item :to="{name: 'home'}">Home</b-nav-item>
                    <b-nav-item :to="{name: 'accounts'}">Accounts</b-nav-item>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
        <main role="main" class="container">
            <div class="jumbotron">
                <router-view></router-view>
            </div>
        </main>
    </div>
</template>

<script>
  export default {
    name: 'App',
  }
</script>

<style scoped>

</style>