import React from "react";

/**
 * Logout Component
 * 
 * This component provides the interaction and HTML elements for the button that logs the user out
 * 
 * @author Sam Oneil w18018623
 *  
 */

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