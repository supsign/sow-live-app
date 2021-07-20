<template>
    <div class="text-base text-gray-900 bg-white rounded-lg shadow-xl">
        <vue-result
            v-for="result in resultsValidRank"
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
import { IResult } from "./result.interface";

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
    public results: Array<IResult>;

    @Prop({
        type: Array
    })
    public starts: Array<any>;

    public get resultsValidRank() {
        const validResults = this.results.filter(result => !!result.rank);
        return validResults.sort((a, b) => a.rank - b.rank);
    }

    public runnerByResult(result: any) {
        return this.runners.find(runner => runner.id === result.runner_id);
    }
}
</script>
