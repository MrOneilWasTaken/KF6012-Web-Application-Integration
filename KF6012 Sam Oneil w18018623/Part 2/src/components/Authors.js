import React from "react";
import Author from "./Author";

/**
 * Authors Component
 * 
 * This connects to the authors API endpoint and maps the results onto the Authors component,
 * displaying the appropriate information through different filters
 *  
 * @author Sam Oneil w18018623
 *  
 */

class Authors extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: []
        }
    }

    componentDidMount() {
        let url = "http://unn-w18018623.newnumyspace.co.uk/kf6012/coursework/part1/api/authors"

        fetch(url)
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => { this.setState({ results: data.results }) })
            .catch((err) => { console.log("An error has occured: ", err) });
    }

    filterSearch = (s) => {
        if (`${s.middle_name}` === undefined) {
            return `${s.first_name} ${s.last_name}`.toLowerCase().includes(this.props.search.toLowerCase())
        }

        return `${s.first_name} ${s.middle_name} ${s.last_name}`.toLowerCase().includes(this.props.search.toLowerCase())
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
            const pageSize = 25
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
                {buttons}
                {filteredResults.map((author, i) => (<Author key={author.author_id} author={author} />))}

            </div>
        )
    }
}

export default Authors