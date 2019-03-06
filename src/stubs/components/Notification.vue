<template>
  <transition name="fade">
    <div
      class="rounded shadow px-6 py-3 bg-sales text-white fixed pin-r pin-b mb-6 mr-6"
      v-show="visible"
      v-text="message"
    ></div>
  </transition>
</template>

<script>
export default {
  props: {
    dataMessage: {},
    timing: {
      default: 3000
    }
  },

  data() {
    return {
      message: this.dataMessage,
      visible: !!this.dataMessage
    }
  },

  mounted() {
    this.cleanMessage()

    document.addEventListener('flash', ({ detail: message }) => {
      this.visible = true
      this.message = message

      this.cleanMessage()
    })
  },

  methods: {
    cleanMessage() {
      setTimeout(() => {
        this.visible = false

        setTimeout(() => {
          this.message = ''
        }, 500);
      }, this.timing)
    }
  }
}
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s, transform 0.3s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
  transform: translateY(100%);
}
</style>
