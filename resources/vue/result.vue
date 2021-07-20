<template>
        <tr>
       {{ result.rank }} {{ runner.name }} {{ result.start }} {{ runner.club ? "club" : "" }} {{ result.radio1 }} 
       {{ result.radio2 }} {{ result.radio3 }} {{ result.radio4 }} {{ result.time }} {{ result.behind }}
       </tr>
</template>

<script lang="ts">
import { Component, Prop } from "vue-property-decorator";
import Vue from "vue";

@Component
export default class VueResult extends Vue {
    @Prop({
        type: Object
    })
    public runner: any;

    @Prop({
        type: Object
    })
    public result: any;
}
</script>
