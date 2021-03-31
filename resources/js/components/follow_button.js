import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';

function Follow(props) {
    const element = document.getElementById('follow_button');
    const user_id = element.getAttribute('user_id');
    const follows = element.getAttribute('follows');
    const [follow, setfollow] = useState(follows)

    const Onclick = async () => {
        try {
            const response = await axios.post(`/follow/${user_id}`);

            console.log(response);
        } catch (e) {
            if (e.response.status) {
                window.location = '/login'

            }
        }
    }
    return (
        <div className="container">
            <button onClick={async () => {
                await Onclick()
                setfollow(prev => !prev)
            }} className={!follow ? 'btn btn-primary' : 'btn btn-outline-info'}>{follow ? 'Unfollow' : 'Follow'}
            </button>
        </div>
    );
}

export default Follow;


if (document.getElementById('follow_button')) {
    ReactDOM.render(<Follow/>, document.getElementById('follow_button'));
}
