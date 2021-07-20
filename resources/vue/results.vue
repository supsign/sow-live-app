<template>
    <div class="px-8 mx-auto">

        <table>
            <tr>
            <th>Rang</th>
            <th>Name</th>
            <th>Club</th>
            <th>Start</th>
            <th>Radio 1</th>
            <th>Radio 2</th>
            <th>Radio 3</th>
            <th>Radio 4</th>
            <th>Ziel</th>
            <th>Differenz</th>
            </tr>

        <vue-result
            v-for="result in results"
            :key="result.id"
            :result="result"
            :runner="runnerByResult(result)"
        >
        </vue-result>

        </table>
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
