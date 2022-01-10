<template>
<footer>
  <div class="wrapper">
    <div class="bottom-appbar">
      <div class="tabs">
        <div class="tab tab--left">
          <div class="flex justify-around px-4 w-full">
            <div class="flex justify-center flex-col px-4 cursor-pointer">
              <img
                class="footer-img-icon"
                src="@/assets/icons/today.svg"
              >
              <div class="footer-img-text">
                Hoy
              </div>
            </div>
            <div class="flex justify-center flex-col px-4 cursor-pointer">
              <img
                class="footer-img-icon"
                src="@/assets/icons/plate.svg"
              >
              <div class="footer-img-text footer-img-text--active">
                Mis pedidos
              </div>
            </div>
          </div>
        </div>
        <div class="tab tab--fab">
          <div class="top">
            <div class="fab text-2xl">
              +
            </div>
          </div>
        </div>
        <div class="tab tab--right">
          <div class="flex justify-around px-4 w-full">
            <div class="flex justify-center flex-col px-4 cursor-pointer">
              <img
                class="footer-img-icon"
                src="@/assets/icons/cutlery.svg"
              >
              <div class="footer-img-text">
                Comidas
              </div>
            </div>
            <div class="flex justify-center flex-col px-4 cursor-pointer">
              <img
                class="footer-img-icon"
                src="@/assets/icons/coach.svg"
              >
              <div class="footer-img-text">
                Coach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'FooterBar'
})
</script>

<style lang="scss" scoped>
.bottom-appbar {
  height: 56px;
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 20;
  .tabs {
    display: flex;
    flex-direction: row;
    height: 100%;
    .tab {
      &--left {
        width: 100%;
        border-top-right-radius: 30px;
        border-top: 1px solid rgba(167, 161, 161, 0.2);
        box-shadow: 0px 6px 7px 0px rgba(23, 23, 23, .1);
      }
      &--right {
        width: 100%;
        border-top-left-radius: 30px;
        border-top: 1px solid rgba(167, 161, 161, 0.2);
        box-shadow: 15px 4px 15px 0px rgba(23, 23, 23, .1);
      }
      &--fab {
        width: 140px;
        height: 100%;
        background: transparent;
        border: none;
        display: flex;

        .top {
          width: 100%;
          height: 50%;
          border-bottom-left-radius: 100px;
          border-bottom-right-radius: 100px;
          background-color: transparent;
          box-shadow: 0px 30px 0px 25px #fff;
          border-bottom: 1px solid rgba(167, 161, 161, 0.1);
          display: flex;
        }
      }
      background-color: #fff;
      width: 33.4%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      border-top: 1px solid #eee;
      box-shadow: 1x 1x 3px #ccc, -1px -1px 3px #ccc;
      span {
        font-size: 12px;
      }
    }
    .fab {
      border-radius: 50%;
      background-color: $green;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 50px;
      height: 50px;
      font-weight: bold;
      color: #fff;
      justify-content: center;
      position: absolute;
      left: 50%;
      transform: translate(-50%, 0);
      bottom: 24px;
    }
  }
}

.footer-img-icon {
  max-height: 16px;
}
.footer-img-text {
  font-size: 10px;
  padding-top: 4px;
  white-space: nowrap;
  &--active {
    color: $green;
  }
}
</style>
