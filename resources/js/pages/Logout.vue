<template>

</template>

<script>
export default {
  created() {
    this.$store.dispatch('destroyToken')
      .then(response => {
        this.$router.go(-1)
      })
  }
}
</script>