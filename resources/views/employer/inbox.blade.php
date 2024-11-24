<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Freelancer| Inbox</title>
    <link rel="stylesheet" href="{{ asset('freelancer_assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/css/perfect-scrollbar.css">
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js"
        integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.8.1/socket.io.js"
        integrity="sha512-8BHxHDLsOHx+flIrQ0DrZcea7MkHqRU5GbTHmbdzMRnAaoCIkZ97PqZcXJkKZckMMhqfoeaJE+DNUVuyoQsO3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.16.1/echo.js"></script>
</head>

<body>
    <section class="message-area" id="message-area" style="min-width: 500px">
        <div class="row">
            <div class="col-12">
                <div class="chat-area">
                    <!-- chatlist -->
                    <div class="chatlist" style="border-right: 1px solid #eee; z-index: 99999;">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="chat-header d-flex"
                                    style="border-bottom: 1px solid #dfdfdf; align-items: center">
                                    <a href="{{ route('employer') }}" title="Back to Dashboard"
                                        style="margin-bottom: 15px; margin-right: 10px; color: #1e1e1e">
                                        <i class="fa-solid fa-angle-left"></i>
                                    </a>
                                    <a class="nav-link " href=" {{ route('employer.profile') }}"
                                        style="margin-bottom: 15px; border-radius: 50%">
                                        <img class="img-xs me-2" src="{{ asset($employer->company_logo) }}"
                                            alt="Profile image" style="width: 48px; border-radius: 50%">
                                    </a>
                                    <span style="font-size: 30px; font-weight: bold; margin-bottom: 15px">Message</span>
                                </div>
                                <div class="modal-body" style="padding-top: 15px" id="chat-list">
                                    <div class="chat-lists">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="chat-list" id="chatlist"
                                                @click.prevent="selectConversation(conversation)"
                                                v-for="conversation in conversations"
                                                :key="'conv-' + conversation.id + '-' + conversation.user.id"
                                                v-if="conversation && conversation.user "
                                                :class="{
                                                    'active': selectedConversation && selectedConversation
                                                        .id === conversation.id
                                                }">
                                                <a href="" class="conv d-flex align-items-center"
                                                    style="justify-content: center; position: relative;"
                                                    :title="`${conversation.user.user.firstname} ${conversation.user.user.lastname}`">
                                                    <div class="flex-shrink-0" style="position: relative;">
                                                        <img class="img-fluid"
                                                            :src="`{{ asset('') }}${conversation.user.avatar}`"
                                                            alt="user img" style="width: 48px">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3 chat-inf">
                                                        <h3>
                                                            @{{ conversation.user.user.firstname }} @{{ conversation.user.user.lastname }}
                                                            <span v-if="conversation.job_title" class="job-tag">
                                                                @{{ conversation.job_title }}
                                                            </span>
                                                        </h3>
                                                       
                                                        <p v-if="conversation.last_message">@{{ conversation.last_message.content }}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatlist -->

                    <!-- chatbox -->
                    <div class="chatbox" v-if="selectedConversation">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="msg-head">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img class="img-fluid"
                                                        :src="`{{ asset('') }}${selectedConversation.user.avatar}`"
                                                        alt="user img" style="width: 48px">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h3>@{{ selectedConversation.user.user.firstname }} @{{ selectedConversation.user.user.lastname }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="msg-body">
                                        <ul>
                                            <li v-for="(msg, index) in messages" :key="'msg-' + msg.id + '-' + index"
                                                :class="msg.sender_id == userId ? 'repaly' : 'sender'">
                                                <p>@{{ msg.content }}</p>
                                                <span class="time">@{{ formatTime(msg.created_at) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="send-box">
                                    <input v-model="message" @keyup.enter="sendMessage" @input="handleTyping"
                                        type="text" class="form-control" aria-label="message…"
                                        placeholder="Write message…">
                                    <button @click="sendMessage" type="button">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatbox -->
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        new Vue({
            el: "#message-area",
            data() {
                return {
                    socket: null,
                    message: "",
                    messages: [],
                    conversations: [],
                    selectedConversation: null,
                    userId: {{ Auth::id() }},
                    userName: "{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}",
                    pendingMessages: new Set(),
                }
            },
            created() {
                this.connectSocket();
                this.loadConversations();
            },
            methods: {
                loadConversations() {
                    axios.get('/employer/conversations')
                        .then(response => {
                            console.log('Raw conversations:', response.data);
                            this.conversations = response.data;
                        })
                        .catch(error => {
                            console.error('Error fetching conversations:', error);
                        });
                },

                connectSocket() {
                    this.socket = io('http://localhost:6001', {
                        withCredentials: true,
                        transportOptions: {
                            polling: {
                                extraHeaders: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .content
                                }
                            }
                        }
                    });

                    this.socket.emit('join', `user.${this.userId}`);

                    this.socket.on('message', (data) => {
                        if (this.selectedConversation && this.selectedConversation.id === data
                            .conversation_id) {
                            const isDuplicate = this.messages.some(msg =>
                                msg.id === data.id ||
                                (msg.content === data.message &&
                                    Math.abs(new Date(msg.created_at) - new Date(data.created_at)) <
                                    1000)
                            );

                            // Nếu là tin nhắn đang pending, xóa khỏi pending list
                            if (this.pendingMessages.has(data.content)) {
                                this.pendingMessages.delete(data.content);
                                return;
                            }

                            // Chỉ thêm tin nhắn nếu không phải là bản sao
                            if (!isDuplicate) {
                                const formattedMessage = {
                                    id: data.id,
                                    conversation_id: data.conversation_id,
                                    sender_id: data.user.id,
                                    content: data.message,
                                    created_at: new Date(data.created_at),
                                    user: data.user
                                };
                                this.messages.push(formattedMessage);
                            }
                        }
                        this.loadConversations();
                    });
                },

                selectConversation(conversation) {
                    this.selectedConversation = conversation;
                    this.messages = [];
                    this.fetchMessages(conversation.id);
                },

                fetchMessages(conversationId) {
                    axios.get(`/employer/conversations/${conversationId}/messages`)
                        .then(response => {
                            this.pendingMessages.clear();
                            this.messages = response.data.map(msg => ({
                                ...msg,
                                created_at: new Date(msg.created_at)
                            }));
                        })
                        .catch(error => {
                            console.error('Error fetching messages:', error);
                        });
                },

                handleTyping() {
                    if (!this.selectedConversation) return;

                    // Emit socket event để thông báo người dùng đang gõ
                    this.socket.emit('typing', {
                        conversation_id: this.selectedConversation.id,
                        user: {
                            id: this.userId,
                            name: this.userName
                        },
                        recipient_id: this.selectedConversation.user.user_id
                    });
                },

                sendMessage() {
                    if (this.message.trim() && this.selectedConversation) {
                        const messageContent = this.message;
                        this.message = "";

                        // Thêm vào pending messages
                        this.pendingMessages.add(messageContent);

                        // Tạo optimistic message với ID tạm thời unique
                        const optimisticMessage = {
                            id: 'temp-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9),
                            conversation_id: this.selectedConversation.id,
                            sender_id: this.userId,
                            content: messageContent,
                            created_at: new Date(),
                            user: {
                                id: this.userId,
                                firstname: this.userName.split(' ')[0],
                                lastname: this.userName.split(' ')[1]
                            }
                        };

                        // Thêm vào danh sách tin nhắn
                        this.messages.push(optimisticMessage);

                        // Gửi tin nhắn lên server
                        axios.post(`/employer/conversations/${this.selectedConversation.id}/messages`, {
                                message: messageContent
                            })
                            .then(response => {
                                // Tìm và cập nhật tin nhắn optimistic
                                const index = this.messages.findIndex(m => m.id === optimisticMessage.id);
                                if (index !== -1) {
                                    // Cập nhật ID và thời gian từ server
                                    this.messages[index].id = response.data.message.id;
                                    this.messages[index].created_at = new Date(response.data.message
                                        .created_at);
                                }

                                // Emit socket event
                                const messageData = {
                                    conversation_id: this.selectedConversation.id,
                                    user: {
                                        id: this.userId,
                                        name: this.userName
                                    },
                                    message: messageContent,
                                    id: response.data.message.id,
                                    created_at: response.data.message.created_at
                                };

                                this.socket.emit('chatMessage', messageData);
                                this.loadConversations();
                            })
                            .catch(error => {
                                console.error('Error sending message:', error);
                                // Xóa tin nhắn optimistic nếu gửi thất bại
                                const index = this.messages.findIndex(m => m.id === optimisticMessage.id);
                                if (index !== -1) {
                                    this.messages.splice(index, 1);
                                }
                                this.pendingMessages.delete(messageContent);
                                this.message = messageContent;
                                alert('Failed to send message. Please try again.');
                            });
                    }
                },

                formatTime(date) {
                    if (!date) return '';
                    return new Date(date).toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                },
            }
        });
    </script>
</body>

</html>
