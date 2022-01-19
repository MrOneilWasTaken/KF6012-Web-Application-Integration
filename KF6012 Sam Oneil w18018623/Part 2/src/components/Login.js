import React from "react";

/**
 * Login Component
 * 
 * This component provides the interaction and HTML elements for the form that logs the user in
 * 
 * @author Sam Oneil w18018623
 *  
 */

class Login extends React.Component {
    render() {
        return (
            <div class="search-box">
                <input
                    class="input-search"
                    type='text'
                    placeholder='Email'
                    value={this.props.email}
                    onChange={this.props.handleEmail}
                />
                <input
                    class="input-search"
                    type='password'
                    placeholder='Password'
                    value={this.props.password}
                    onChange={this.props.handlePassword}
                />
                <button onClick={this.props.handleLoginClick}>Log in</button>
            </div>
        );
    }
}

export default Login;