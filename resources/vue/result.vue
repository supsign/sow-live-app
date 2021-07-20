<template>
    <div class="text-base text-gray-900 bg-white rounded-lg shadow-xl">
        {{ runner.name }}
    </div>
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
