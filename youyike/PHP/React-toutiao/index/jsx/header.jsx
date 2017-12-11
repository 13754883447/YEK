class Hd extends React.Component{
    render() {
        return (
            <div className="header">
                <div>
                    <a href="#/" className="iconfont icon-xinjian">
                    </a>
                </div>
                <div><span>今日头条</span>
                    <a href="#/" className="iconfont icon-refresh">
                    </a>
                </div>
                <div>
                    <a href="sousuo.html" className="iconfont icon-63">
                    </a>
                </div>
            </div>
        )
    }
}
ReactDOM.render(<Hd/>,document.querySelector('#header'));