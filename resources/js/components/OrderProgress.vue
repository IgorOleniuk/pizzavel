<template>
  <div>
    <div class="progress">
      <progressbar :now="progress" label type="success" striped animated></progressbar>
    </div>

    <div class="tracker mt-3 mb-2">
      <strong>Order Status:</strong> {{ statusNew }} <br>
    </div>

    <img src="/img/delivery.gif" alt="delivery" v-if="progress >= 100 " style="width: 300px; height: 200px;">
  </div>
</template>

<script>
import { progressbar } from 'vue-strap';

export default {
  components: {
    progressbar
  },

  props: ['status', 'initial', 'order_id'],

  data() {
    return {
      statusNew: this.status,
      progress: this.initial,
    }
  },

  mounted() {
    Echo.channel('pizza-tracker.' + this.order_id)
      .listen('OrderStatusChanged', (order) => {
         this.statusNew = order.status_name;
         this.progress = order.status_percent;
      });
  },
}
</script>
