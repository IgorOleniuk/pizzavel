<template>
  <div>
    <li class="dropdown" v-show="notifications.length > 0">
      <a href="#" class="dropdown-toggle text-danger" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-bell"></i>
        <span class="notification-count label label-danger">{{ notifications.length }}</span>
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-notifications" role="menu">
        <li v-for="notification in notifications">
          <a :href="notification.url">
            <div>
              <i class="fa fa-exclamation-circle fa-fw"></i> {{ notification.description }} <br>
              <span class="pull-right text-muted small"> <timeago :datetime="notification.time" :auto-update="60"></timeago> </span>
            </div>
          </a>
          <div class="divider"></div>
        </li>
      </ul>
    </li>
  </div>
</template>

<script>
import VueTimeago from 'vue-timeago'

Vue.use(VueTimeago, {
  name: 'timeago',
  locale: 'en-US',
});

export default {
  props: ['user_id'],

  data() {
    return {
      notifications: [],
    }
  },

  mounted() {
    Echo.channel('pizza-tracker')
    .listen('OrderStatusChanged', (order) => {
        this.notifications.unshift({
          description: 'Order ID: ' + order.id + ' updated',
          url: '/order/' + order.id,
          time: new Date()
        })
    });
  },
}
</script>
