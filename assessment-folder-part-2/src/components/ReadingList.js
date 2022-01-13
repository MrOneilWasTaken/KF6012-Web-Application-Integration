import React from "react";
import Paper from "./Paper";
import ReadingCheckBox from "./ReadingCheckBox";

class ReadingList extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: [],
            readinglist: []
        }
        console.log("Constructor launched")
    }

    componentDidMount() {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/api/papers"

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
                console.log("Something went wrong lad ", err)
            });

        url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/api/readinglist"

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
                console.log("Something went wrong lad ", err)
            });

    }

    render() {
        let results = this.state.results

        console.log("Rendered")

        return (
            <div>
                {results.map((paper) => (
                    <div key={paper.paper_id}>
                        <ReadingCheckBox readinglist={this.state.readinglist} paper_id={paper.paper_id} />
                        <Paper paper={paper} />
                    </div>
                )
                )}
            </div>
        )

    }
}

export default ReadingList;