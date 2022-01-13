import React from "react";
import Author from "./Author";

class Authors extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: []
        }
    }

    componentDidMount() {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/api/authors"

        //can filter by ID here now

        fetch(url)
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => { this.setState({ results: data.results }) })
            .catch((err) => { console.log("Something went wrong m8", err) });
    }

    filterSearch = (s) => {
        return s.first_name.toLowerCase().includes(this.props.search.toLowerCase())
    }

    render() {

        let noData = ""

        if (this.state.results.length === 0) {
            noData = <p>No Data</p>
        }

        let filteredResults = this.state.results

        if ((filteredResults.length > 0) && (this.props.search !== undefined)) {
            filteredResults = filteredResults.filter(this.filterSearch)
        }

        let buttons = ""

        if (this.props.page !== undefined) {
            const pageSize = 10
            let pageMax = this.props.page * pageSize
            let pageMin = pageMax - pageSize

            buttons = (
                <div>
                    <button onClick={this.props.handlePreviousClick} disabled={this.props.page <= 1}>Previous</button>
                    <button onClick={this.props.handleNextClick} disabled={this.props.page >= Math.ceil(filteredResults.length / pageSize)}>Next</button>
                </div>
            )
            filteredResults = filteredResults.slice(pageMin, pageMax)
        }

        return (
            <div>
                {noData}
                {/* {this.state.results.map((paper, i) => (<Paper key={paper.title} paper={paper} />))} */}
                {filteredResults.map((author, i) => (<Author key={author.author_id} author={author} />))}
                {buttons}
            </div>
        )
    }
}

export default Authors