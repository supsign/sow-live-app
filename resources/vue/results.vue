<template>
    <div class="text-base text-gray-900 bg-white rounded-lg shadow-xl">
        <vue-result
            v-for="result in results"
            :key="result.id"
            :result="result"
            :runner="runnerByResult(result)"
        >
        </vue-result>
    </div>
</template>

<script lang="ts">
import { Component, Prop } from "vue-property-decorator";
import Vue from "vue";
import VueResult from "./result.vue";

@Component({
    components: {
        VueResult
    }
})
export default class VueResults extends Vue {
    @Prop({
        type: Array
    })
    public runners: Array<any>;

    @Prop({
        type: Array
    })
    public results: Array<any>;

    @Prop({
        type: Array
    })
    public starts: Array<any>;

    public runnerByResult(result: any) {
        return this.runners.find(runner => runner.id === result.runner_id);
    }
}
</script>
