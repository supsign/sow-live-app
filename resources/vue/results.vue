<template>
    <div class="px-8 mx-auto">
        <table class="w-full mb-8 text-xl">
            <tr>
                <th class="pr-4 text-right">Rang</th>
                <th class="text-left">Name</th>
                                <th class="w-20 pr-4 text-right">Start</th>

                <th class="text-left">Club</th>
                <th v-if="radioIsUsed.radio1" class="pr-4 text-right w-28">
                    Radio 1
                </th>
                <th v-if="radioIsUsed.radio2" class="pr-4 text-right w-28 ">
                    Radio 2
                </th>
                <th v-if="radioIsUsed.radio3" class="pr-4 text-right w-28">
                    Radio 3
                </th>
                <th v-if="radioIsUsed.radio4" class="pr-4 text-right w-28">
                    Radio 4
                </th>
                <th class="w-20 pr-4 text-right ">Ziel</th>
                <th class="w-20 pr-4 text-right">+</th>
            </tr>

            <vue-result
                :radioIsUsed="radioIsUsed"
                v-for="result in resultsValidRank"
                :key="result.id"
                :result="result"
                :runner="runnerByResult(result)"
            >
            </vue-result>
            <vue-result
                :radioIsUsed="radioIsUsed"
                v-for="result in resultsInvalidRank"
                :key="result.id"
                :result="result"
                :runner="runnerByResult(result)"
            >
            </vue-result>
            <vue-result
                :radioIsUsed="radioIsUsed"
                v-for="result in resultsNotFinishedWithStartTime"
                :key="result.id"
                :result="result"
                :runner="runnerByResult(result)"
            >
            </vue-result>
            <vue-result
                :radioIsUsed="radioIsUsed"
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
        return invalidResults.sort((a, b) => a.start?.localeCompare(b.start));
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
            this.runnerByResult(a)?.name?.localeCompare(
                this.runnerByResult(b)?.name
            )
        );
    }

    public runnerByResult(result: any) {
        return this.runners.find(runner => runner.id === result.runner_id);
    }

    public get radioIsUsed(): {
        radio1: boolean;
        radio2: boolean;
        radio3: boolean;
        radio4: boolean;
    } {
        const radio1 = !!this.results.find(result => result.radio1);
        const radio2 = !!this.results.find(result => result.radio2);
        const radio3 = !!this.results.find(result => result.radio3);
        const radio4 = !!this.results.find(result => result.radio4);
        return { radio1, radio2, radio3, radio4 };
    }
}
</script>
