const query = (q) => document.querySelector(q);

const inputFieldValue = () => query('#input-field > form > input').value;
const cleanInputField = () => {
    query('#input-field > form > input').value = '';
};
const msgFieldAppend = ({ msg, time }) => {
    const msgField = query('#msg-field');
    const origin = msgField.innerHTML;

    msgField.innerHTML =
        `<section class="messages">
        <p class="from">
            <span class="user">Guest</span> @
		    <span class="time">${time}<span>
        </p>
		<p class="info">
            <span class="prompt"> 說 </span>
            <span class="msg"> ${msg} </span>
        </p>
	</section>` + origin;
};

const handleSubmit = (e) => {
    const msg = inputFieldValue();
    msgFieldAppend({
        msg,
        time: new Date()
    });
    cleanInputField();
    return e.preventDefault();
};
