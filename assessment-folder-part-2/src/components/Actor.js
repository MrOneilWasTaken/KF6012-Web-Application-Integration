import React from "react";
import Films from "./Films";

class Actor extends React.Component {
    constructor(props) {
        super(props)
        this.state = { display: false }
    }

    handleClick = () => {
        this.setState({ display: !this.state.display })
    }

    render() {
        let details = ""

        if (this.state.display) {
            details =
                <div>
                    <Films actorid={this.props.actor.actor_id} />
                </div>
        }

        return (
            <div>
                <p onClick={this.handleClick}>{this.props.actor.first_name} {this.props.actor.last_name}</p>
                {details}
            </div>
        )
    }
}

export default Actor;