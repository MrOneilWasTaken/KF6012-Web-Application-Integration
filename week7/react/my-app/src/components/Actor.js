import React from "react";

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
                <p>{this.props.actor.last_name}</p>
            </div>
        }

        return (
            <div onClick={this.handleClick}>
                <p>{this.props.actor.first_name}</p>
                {details}
            </div>
        )
    }
}

export default Actor;