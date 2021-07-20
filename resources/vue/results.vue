<template>
    <div class="text-base text-gray-900 bg-white rounded-lg shadow-xl">
        {{ results }}
    </div>
</template>

<script lang="ts">
import { Component, Prop } from "vue-property-decorator";
import Vue from "vue";

@Component
export default class VueResults extends Vue {
    @Prop({
        type: Array
    })
    runners: any;

    @Prop({
        type: Array
    })
    results: any;

    @Prop({
        type: Array
    })
    starts: any;
}
</script>
