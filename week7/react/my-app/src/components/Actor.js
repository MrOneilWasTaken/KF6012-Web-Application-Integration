import React from "react"
import Films from "./Films.js"

class Actor extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            display: false
        }
    }

    handleClick = () => {
        this.setState({ display: !this.state.display })
    }

    render() {
        let details = "";

        if (this.state.display) {
            details = <div>
                <p><Films /></p>
            </div>
        }

        return (
            <div onClick={this.handleClick}>
                <p>{this.props.actor.first_name} {this.props.actor.last_name}</p>
                {details}
            </div>
        )
    }
}

export default Actor;