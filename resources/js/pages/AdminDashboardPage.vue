<template>
  <div>
    <div class="container">
      <div class="card">
        <div class="card-header">Welcome Admin</div>
        <div class="card-body">
          <div class="form-row">
            <button class="btn btn-primary" @click="generateCards()">Generate Card</button>
            <button class="btn btn-info">Deactivate Cards</button>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">Cards Generated 0</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">Sold Out 0</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">Students 0</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vouchers: {},
    };
  },
  methods: {
    async generateCards() {
      await axios
        .get("api/generate_code")
        .then(({ data }) => {
          this.vouchers = data;
          console.log(this.vouchers);
        })
        .catch(({ response }) => {
          console.log(response);
        });
    },
    async loadVouchers() {
      await axios
        .get("api/vouchers")
        .then(({ data }) => {
          this.vouchers = data;
          console.log(this.vouchers);
        })
        .catch(({ response }) => {
          console.log(response);
        });
    },
  },
  mounted() {
    this.loadVouchers();
  },
};
</script>

<style>
</style>