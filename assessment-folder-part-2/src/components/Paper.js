import React from "react";

class Paper extends React.Component {
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
                    <p>{this.props.paper.abstract}</p>
                </div>
        }

        return (
            <div>
                <h3 onClick={this.handleClick}>{this.props.paper.title}</h3>
                {details}
            </div>
        )
    }
}

export default Paper