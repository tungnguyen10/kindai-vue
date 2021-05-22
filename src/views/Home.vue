<template>
  <div class="home">
    <Pagetop />
    <Sharebottom titleshare="SNSでシェアしよう" img1_share="img_heart" img2_share="img_flour" :share_url="url" />
  </div>
</template>

<script>
// @ is an alias to /src
import $ from 'jquery'
import Pagetop from '@/components/Pagetop.vue'
import Sharebottom from '@/components/Sharebottom.vue'
import { globalFuncs } from '../main.js'

export default {
  name: 'Home',
  data() {
    return {
      url: globalFuncs.baseUrl,
    }
  },
  components: {
    Pagetop,
    Sharebottom
  }, 
}
</script>