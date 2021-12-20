import React from "react";

class Logout extends React.Component {
    render() {
        return (
            <div>
                <button onClick={this.props.handleLogoutClick}>Logout</button>
            </div>
        );
    }
}

export default Logout;