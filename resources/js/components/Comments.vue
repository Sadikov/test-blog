<template>
    <div>
        <template v-if="showMessageSent">
            <b-alert variant="success" show>
                Сообщение отправлено
            </b-alert>
        </template>
        <template v-else>
            <b-form>
                <b-form-group
                    id="subject-group"
                    label="Subject:"
                    label-for="subject"
                >
                    <b-form-input
                        id="subject"
                        v-model="comment.subject"
                        required
                    />
                </b-form-group>
                <b-form-group
                    id="comment-group"
                    label="Comment:"
                    label-for="comment"
                >
                    <b-form-textarea
                        id="comment"
                        v-model="comment.text"
                        required
                        rows="7"
                    />
                </b-form-group>
                <b-button
                    type="button"
                    variant="success"
                    @click="sendMessage"
                >
                    Send
                </b-button>
            </b-form>
        </template>
        <div class="published-comments" v-if="published.length">
            <b-card v-for="comment in published" class="mb-4">
                <b-card-title>
                    {{ comment.subject }}
                </b-card-title>
                <p>{{ comment.text }}</p>
            </b-card>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Comments',
    props: {
        sendCallback: {
            type: Function,
            default: function () {},
        },
        published: {
            type: Array,
            default: [],
        }
    },
    data() {
        return {
            comment: {
                subject: '',
                text: '',
            },
            showMessageSent: false,
        };
    },
    methods: {
        sendMessage() {
            if (this.sendCallback(this.comment)) {
                this.showMessageSent = true;
            }
        }
    }
};
</script>

<style scoped>
.published-comments {
    padding-top: 3rem;
}
</style>
