import React from "react";
import Paper from "./Paper";
/**
 * Reading List component
 * 
 * This component renders the papers and checks the user's reading list to know which ones need
 * to be chcked so they can be unchecked if the user wants to remove them from their list
 *  
 * @author Sam Oneil w18018623
 *  
 */
class ReadingList extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: [],
            readinglist: [],
            search: []
        }
        console.log("Constructor launched")
    }

    componentDidMount() {
        let url = "http://unn-w18018623.newnumyspace.co.uk/kf6012/coursework/part1/api/papers"

        fetch(url)
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => {
                this.setState({ results: data.results })

            })
            .catch((err) => {
                console.log("An error has occured: ", err)
            });

        url = "http://unn-w18018623.newnumyspace.co.uk/kf6012/coursework/part1/api/readinglist"

        let formData = new FormData();
        formData.append('token', localStorage.getItem('myReadingListToken'))

        fetch(url, {
            method: 'POST',
            headers: new Headers(),
            body: formData
        })
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => {
                this.setState({ readinglist: data.results })

            })
            .catch((err) => {
                console.log("An error has occured: ", err)
            });

    }

    filterSearch = (s) => {
        return s.title.toLowerCase().includes(this.props.search.toLowerCase()) || s.abstract.toLowerCase().includes(this.props.search.toLowerCase())
    }

    render() {
        let filteredResults = this.state.results

        if ((filteredResults.length > 0) && (this.props.search !== undefined)) {
            filteredResults = filteredResults.filter(this.filterSearch)
        }

        let buttons = ""

        if (this.props.page !== undefined) {
            const pageSize = 15
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
                {buttons}
                {filteredResults.map((paper, i) => (
                    <div>
                        <Paper key={paper.title + i} paper={paper} readinglist={this.state.readinglist} />
                    </div>
                )
                )}

            </div>
        )

    }
}

export default ReadingList;