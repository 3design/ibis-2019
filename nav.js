function renderNavItem (item) {
    return $("<li>")
        .addClass("nav-item")
        .addClass(
            window.location.href.indexOf(item.href) >= 0 ?
            "active" :
            ""
        )
        .append(
            $("<a>")
                .addClass("nav-link")
                .attr("href", item.href)
                .text(item.text)
        );
}
function renderNavItemDropdown (item) {
    var menu = $("<div>")
        .addClass("dropdown-menu")
        .attr("aria-labelledby", item.id);

    for (var i=0; i<item.subItems.length; ++i) {
        var subItem = item.subItems[i];
        menu.append(
            $("<a>")
                .addClass("dropdown-item")
                .attr("href", subItem.href)
                .text(subItem.text)
        );
    }

    return $("<li>")
        .addClass("nav-item dropdown")
        .append(
            $("<a>")
                .addClass("nav-link dropdown-toggle")
                .attr("href", "#")
                .attr("id", item.id)
                .attr("data-toggle", "dropdown")
                .attr("aria-haspopup", "true")
                .attr("aria-expanded", "false")
                .text(item.text)
        )
        .append(
            menu
        );
}
function renderNav () {
    var brand = $("<a>")
        .addClass("navbar-brand")
        .attr("href", "index.html")
        .append(
            $("<img>")
                .addClass("ibis-logo")
                .attr("src", "images/ibis-logo-navy-on-white-2019.png")
                .css({
                    width : "50px",
                })
        );
    var toggler = $("<button>")
        .addClass("navbar-toggler")
        .attr("type", "button")
        .attr("data-toggle", "collapse")
        .attr("data-target", "#navbarNavDropdown")
        .attr("aria-controls", "navbarNavDropdown")
        .attr("aria-expanded", "false")
        .attr("aria-label", "Toggle navigation")
        .append(
            $("<span>")
                .addClass("navbar-toggler-icon")
        );
    const collapse = $("<div>")
        .addClass("collapse navbar-collapse")
        .attr("id", "navbarNavDropdown")
        .append(
            $("<ul>")
                .addClass("navbar-nav")
                .append(
                    renderNavItem({
                        href : "index.html",
                        text : "Home",
                    })
                )
                .append(
                    renderNavItemDropdown({
                        id : "navbarDropdownMenuLink-recruiting",
                        text : "Now Recruiting",
                        subItems : [
                            {
                                href : "recruitment-1.html",
                                text : "Infants Less Than 6 Months of Age Who Have an Older Sibling with Autism Spectrum Disorder",
                            },
                            {
                                href : "recruitment-2-and-3.html",
                                text : "Infants Under 6 Months of Age Who Have Down Syndrome",
                            },
                            {
                                href : "recruitment-2-and-3.html",
                                text : "7-10 Year Old Children Who Have Down Syndrome",
                            },
                        ],
                    })
                )
                .append(
                    renderNavItemDropdown({
                        id : "navbarDropdownMenuLink-studySites",
                        text : "Study Sites",
                        subItems : [
                            {
                                href : "phi.html",
                                text : "Philadelphia",
                            },
                            {
                                href : "sea.html",
                                text : "Seattle",
                            },
                            {
                                href : "umn.html",
                                text : "Minnesota",
                            },
                            {
                                href : "stl.html",
                                text : "St. Louis",
                            },
                            {
                                href : "unc.html",
                                text : "Chapel Hill",
                            },
                        ],
                    })
                )
                .append(
                    renderNavItem({
                        href : "faq.html",
                        text : "FAQ",
                    })
                )
                .append(
                    renderNavItem({
                        href : "ibis-news.html",
                        text : "IBIS in the News",
                    })
                )
                .append(
                    renderNavItem({
                        href : "publications.html",
                        text : "Publications",
                    })
                )
        );
    const nav = $("<nav>")
        .addClass("navbar navbar-expand-lg navbar-light fixed-top navbar-custom shadow-sm p-3 mb-5 bg-white rounded")
        .append(brand)
        .append(toggler)
        .append(collapse);
    $(document.body)
        .prepend(nav);
}
$(document).ready(function () {
    renderNav();
});
