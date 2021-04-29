<template>
  <div class="home">
    <Pagetop />
    <Sharebottom titleshare="SNSでシェアしよう" img1_share="img_heart" img2_share="img_flour"/>
  </div>
</template>

<script>
// @ is an alias to /src
import Pagetop from '@/components/Pagetop.vue'
import Sharebottom from '@/components/Sharebottom.vue'

export default {
  name: 'Home',
  components: {
    Pagetop,
    Sharebottom
  }
}
</script>