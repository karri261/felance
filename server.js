import { createServer } from 'http';
import { Server } from 'socket.io';

const server = createServer();
const io = new Server(server, {
    cors: {
        origin: "http://127.0.0.1:8000",
        methods: ["GET", "POST"],
        credentials: true
    }
});

io.on('connection', (socket) => {
    console.log('A user connected');

    socket.on('join', (room) => {
        socket.join(room);
        console.log(`User joined room: ${room}`);
    });

    socket.on('chatMessage', (data) => {
        io.emit('message', {
            conversation_id: data.conversation_id,
            user: data.user,
            message: data.message,
            id: data.id,
            created_at: data.created_at
        });
    });

    // socket.on('typing', (data) => {
    //     socket.broadcast
    //         .to(`user.${data.recipient_id}`)
    //         .emit('userTyping', {
    //             conversation_id: data.conversation_id,
    //             user: data.user
    //         });
    // });

    socket.on('disconnect', () => {
        console.log('User disconnected');
    });
});

server.listen(6001, () => {
    console.log('Socket.IO server running on port 6001');
});