import React from "react";
import ReadingCheckBox from "./ReadingCheckBox";

/**
 * paper Component
 * 
 * This component formats the data that an individual result from the Papers component would get
 *  
 * @author Sam Oneil w18018623
 *  
 */

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
        let checkbox = ""

        if (this.props.readinglist !== undefined) {
            checkbox =
                <ReadingCheckBox readinglist={this.props.readinglist} paper_id={this.props.paper.paper_id} />
        }

        if (this.state.display) {
            details =
                <div class="basic-grid">
                    <div class="card">
                        <h4>Authors</h4>
                        {this.props.paper.authors.map((author, i) => (<p key={i}>{author.first_name} {author.middle_name} {author.last_name}</p>))}
                    </div>
                    <div class="card">
                        <h4>Abstract</h4>
                        <p>{this.props.paper.abstract}</p>
                    </div>
                    <div class="card">
                        <h4>Awards</h4>
                        {this.props.paper.awards.map((award, i) => (<p key={i}>{award.name}</p>))}
                    </div>
                </div>
        }

        return (
            <div class="card" onClick={this.handleClick}>
                <h3>{checkbox}{this.props.paper.title}</h3>
                {details}
            </div>
        )
    }
}

export default Paper