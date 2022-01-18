import React from "react";
import PaperAuthor from "./PaperAuthor";

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
                    <h4>Authors</h4>
                    {this.props.paper.authors.map((author, i) => (<p key={i}>{author.first_name} {author.middle_name} {author.last_name}</p>))}

                    <h4>Abstract</h4>
                    <p>{this.props.paper.abstract}</p>

                    <h4>Awards</h4>
                    {this.props.paper.awards.map((award, i) => (<p key={i}>{award.name}</p>))}




                </div>
        }

        return (
            <div>
                <h3 onClick={this.handleClick}>{this.props.paper.title}</h3>
                <PaperAuthor paperid={this.props.paper.paper_id} />
                {details}
            </div>
        )
    }
}

export default Paper