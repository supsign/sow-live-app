<template>
    <div class="px-8 mx-auto">
        <table class="w-full mb-8 text-xl">
            <tr>
                <th class="pr-4 text-right">Rang</th>
                <th class="text-left">Name</th>
                <th class="text-left">Club</th>
                <th class="w-20 text-right">Start</th>
                <th class="w-20 text-right">Radio 1</th>
                <th class="w-20 text-right ">Radio 2</th>
                <th class="w-20 text-right">Radio 3</th>
                <th class="w-20 text-right">Radio 4</th>
                <th class="w-20 text-right">Ziel</th>
                <th class="w-20 text-right">+</th>
            </tr>

            <vue-result
                v-for="result in resultsValidRank"
                :key="result.id"
                :result="result"
                :runner="runnerByResult(result)"
            >
            </vue-result>
            <vue-result
                v-for="result in resultsInvalidRank"
                :key="result.id"
                :result="result"
                :runner="runnerByResult(result)"
            >
            </vue-result>
            <vue-result
                v-for="result in resultsNotFinishedWithStartTime"
                :key="result.id"
                :result="result"
                :runner="runnerByResult(result)"
            >
            </vue-result>
            <vue-result
                v-for="result in resultsWithoutStartTime"
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
import { IResult } from "./result.interface";
import axios from "axios";

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
    public initResults: Array<IResult>;

    public results: Array<IResult> = null;

    public conReloadStarts: NodeJS.Timer;

    @Prop({
        type: Array
    })
    public starts: Array<any>;

    public created() {
        this.results = this.initResults;
    }

    public mounted() {
        this.continouslyReloadStarts();
    }

    public beforeDestroy() {
        clearInterval(this.conReloadStarts);
    }

    public continouslyReloadStarts() {
        this.conReloadStarts = setInterval(this.reloadStarts, 5000);
    }

    public async reloadStarts() {
        if (!this.results.length) {
            return;
        }
        const results = await axios.post("/getresults", {
            ids: this.results.map(result => result.id)
        });
        this.results = results.data;
    }

    public get resultsValidRank() {
        const validResults = this.results.filter(result => !!result.rank);
        return validResults.sort((a, b) => a.rank - b.rank);
    }

    public get resultsInvalidRank() {
        const invalidResults = this.results.filter(
            result => !result.rank && result.time
        );
        return invalidResults.sort((a, b) => a.start.localeCompare(b.start));
    }

    public get resultsNotFinishedWithStartTime() {
        const notFinishedWithStartTime = this.results.filter(
            result =>
                !result.rank &&
                !result.time &&
                result.start &&
                result.start !== "00:00"
        );
        return notFinishedWithStartTime.sort((a, b) =>
            a.start_full.localeCompare(b.start_full)
        );
    }

    public get resultsWithoutStartTime() {
        const withoutStartTime = this.results.filter(
            result =>
                !result.rank &&
                !result.time &&
                (!result.start || result.start == "00:00")
        );
        return withoutStartTime.sort((a, b) =>
            this.runnerByResult(a)?.name.localeCompare(
                this.runnerByResult(b).name
            )
        );
    }

    public runnerByResult(result: any) {
        return this.runners.find(runner => runner.id === result.runner_id);
    }
}
</script>
